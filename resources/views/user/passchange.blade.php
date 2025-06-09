@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card bg-light pt-3 pb-3 my-5">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <h4 class="card-title text-center">Change password</h4>
                {{-- Hiển thị thông báo lỗi --}}
                @if(session('error'))
                    <div class="alert alert-danger text-center">
                        {{ session('error') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger text-center">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{ route('passUpdate') }}" method="POST">
                    @csrf
                    <table width="110%">
                        <tr>
                            <td><label for="password">Old password:</label></td>
                            <td><input type="password" name="old-password" required style="width: 220px;"></td>
                        </tr>
                        <tr>
                            <td><label for="password-repeat">New password:</label></td>
                            <td><input type="password" name="new-password" required style="width: 220px;"></td>
                        </tr>
                        <tr>
                            <td><label for="password-repeat">Confirm new password:</label></td>
                            <td><input type="password" name="new-password-repeat" required style="width: 220px;"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" class="btn btn-primary btn-block mt-3" name="save"
                                    value="Save"></td>
                        </tr>
                    </table>
                </form>
            </article>
        </div>
    </div>

@endsection