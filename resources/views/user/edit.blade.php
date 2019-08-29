@extends('layouts.app')
@section('title','edit_memer')
@section('content')
    <main class="container">
        <article>
            <div class="col-sm-8">
                <h1>Edit Profile</h1>
                <form  action="{{ route('member.update', $user->id) }}" method="POST" role="form">
                    @method('PATCH')
                    @csrf
                    <fieldset>
                     <h2>d</h2>



                    </fieldset>
                </form>
            </div>
        </article>
        <aside>
            <div class="col-sm-4">
            </div>
        </aside>
    </main>

@endsection