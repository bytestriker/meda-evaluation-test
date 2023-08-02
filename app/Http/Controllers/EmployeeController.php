<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends AppBaseController
{
    /** @var UserRepository $userRepository*/
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     */
    public function index(Request $request)
    {
        $users = $this->userRepository->onlyEmployees()->paginate(10);

        return view('employees.index')
            ->with('employees', $users);
    }

    /**
     * Show the form for creating a new User.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created User in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();

        $user = $this->userRepository->create($input);
        $user->password = Hash::make($input['password']);
        $user->save();


        Flash::success('User saved successfully.');

        return redirect(route('employees.index'));
    }

    /**
     * Display the specified User.
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('employees.index'));
        }

        return view('employees.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('employees.index'));
        }

        return view('employees.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('employees.index'));
        }

        $user = $this->userRepository->update($request->all(), $id);
        if (!empty($request->input('password'))) {
            if( ! Hash::check( $user->password , $request->input('password') ) ) {
                $user->password = Hash::make($request->input('password'));
                $user->save();    
            }    
        }

        Flash::success('User updated successfully.');
        if (strtolower(auth()->user()->type) === 'admin') {

            return redirect(route('employees.index'));
        } else {
            return redirect(route('home'));

        }
    }

    /**
     * Remove the specified User from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('employees.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('employees.index'));
    }
}
