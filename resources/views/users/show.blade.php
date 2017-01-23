@extends('layouts.default')
@section('content')
    <section class="section nav-adjustment">
        <div class="container is-fluid">

            <div class="columns is-multiline has-text-centered">
                <div class="column is-12">
                    @include('shared.message-alert')
                </div>
                <div class="column is-12">
                    <article class="media">
                        <figure class="media-left">
                            <div class="image is-96x96">
                                <a href="/user/{{ $user->id }}"><img src="/images/profile_pics/{{ $user->userProfile->image_path }}" class="profile-pic" alt=""></a>
                            </div>
                        </figure>
                        <div class="media-content">
                            <div class="content">
                                <span>
                                    <strong>{{ $user->first_name . ' ' . $user->last_name }}</strong>
                                </span> &mdash;
                                <small>
                                    @if( ! empty( $user->userProfile->title ))
                                        {{ $user->userProfile->title }}
                                    @endif
                                </small> &mdash;
                                <small>
                                    <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                </small>
                                <br/>
                                @if(! empty( $user->userProfile->simple_note ))
                                    {{ $user->userProfile->simple_note }}
                                @endif
                            </div>
                            <nav class="level">
                                <div class="level-left">
                                    <small class="level-item">
                                        <span class="button-spacer">
                                            <a class="button is-small" href="user/{{$user->id}}/contacts">Contacts</a>
                                            <a class="button is-small" href="user/{{$user->id}}/loans">Open Loans</a>
                                            <a class="button is-small" href="user/{{$user->id}}/loans/closed">Completed Loans</a>
                                            <a class="button is-small" href="user/{{$user->id}}/journals">Journals</a>
                                            <a class="button is-small" href="user/{{$user->id}}/documents">Documents</a>
                                        </span>
                                    </small>
                                </div>
                            </nav>
                        </div>
                        <div class="media-right">
                            <div class="edit-partner"><i class="fa fa-edit fa-fw fa-lg" style="color: #336699;"></i></div>
                            <div id="edit-modal" class="modal">
                                <div class="modal-background"></div>
                                <div class="modal-content has-text-left">
                                    <div class="box">
                                        <div class="title is-3"><strong>Edit Partner: {{ $user->first_name . ' ' . $user->last_name }}</strong></div>
                                        <div class="subtitle is-6">Make your changes and click on update.</div>
                                        <form id="edit-partner" method="post">
                                            <div class="columns is-multiline">
                                                {{ method_field('put') }}
                                                {{ csrf_field() }}
                                                <input type="hidden" id="user_type_id" name="user_type_id" value="1">
                                                <div class="column is-half-tablet">
                                                    <label class="label" for="first_name">First Name</label>
                                                    <input class="input" type="text" id="first_name" name="first_name"
                                                           placeholder="First Name" required="required" value="{{ $user->first_name }}">
                                                    <span class="required help is-danger">* required</span>
                                                </div>
                                                <div class="column is-half-tablet">
                                                    <label class="label" for="last_name">Last Name</label>
                                                    <input class="input" type="text" id="last_name" name="last_name"
                                                           placeholder="Last Name" required="required" value="{{ $user->last_name }}">
                                                    <span class="required help is-danger">* required</span>
                                                </div>
                                                <div class="column is-half-tablet">
                                                    <label class="label" for="business_phone">Business Phone</label>
                                                    <input class="input" type="text" id="business_phone" name="business_phone" placeholder="Business Phone" required="required" value="{{ $user->userProfile->business_phone }}">
                                                    <span class="help is-black">(optional)</span>
                                                </div>
                                                <div class="column is-half-tablet">
                                                    <label class="label" for="home_phone">Home Phone</label>
                                                    <input class="input" type="text" id="home_phone" name="home_phone" placeholder="Home Phone" required="required" value="{{ $user->userProfile->home_phone }}">
                                                    <span class="help is-black">(optional)</span>
                                                </div>
                                                <div class="column is-half-tablet">
                                                    <label class="label" for="email">Email Address</label>
                                                    <input class="input" type="text" id="email" name="email" placeholder="Email Address" required="required" value="{{ $user->email }}">
                                                    <span class="required help is-danger">* required</span>
                                                </div>
                                                <div class="column is-half-tablet">
                                                    <label class="label" for="title">Title</label>
                                                    <input class="input" type="text" id="title" name="title" placeholder="Title" required="required" value="{{ $user->userProfile->title }}">
                                                    <span class="required help is-danger">* required</span>
                                                </div>
                                                <div class="column is-full">
                                                    <label class="label" for="note">Note</label>
                                                    <p class="control">
                                                        <textarea class="textarea" id="note" name="note" placeholder="Note" maxlength="510">{{ $user->userProfile->simple_note }}</textarea>
                                                        <span class="help is-black">(optional)</span>
                                                    </p>
                                                </div>
                                                <div class="column is-full has-text-right">
                                                    <button class="button is-danger" type="submit" formaction="/user/{{ $user->id }}">Update Partner</button>
                                                    <button class="button cancel-modal">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <button class="modal-close"></button>
                            </div>
                            <div class="destroy-partner"><i class="fa fa-trash fa-fw fa-lg" style="color: #c40000;"></i></div>
                            <div id="destroy-modal" class="modal">
                                <div class="modal-background"></div>
                                <div class="modal-content">
                                    <div class="box">
                                        <div class="title is-2"><strong>Are You Really Sure?</strong></div>
                                        <div class="subtitle is-3">There is no undo!</div>
                                        <form id="destroy-partner" method="post">
                                            {{ method_field('put') }}
                                            {{ csrf_field() }}
                                            <input type="submit" class="button is-danger" value="Delete User {{ $user->userProfile->first_name . ' ' . $user->userProfile->last_name }} ? (click me)" formaction="/user/{{ $user->id }}">
                                            <button class="button cancel-modal">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                                <button class="modal-close"></button>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="column is-12">
                    @include('shared.user.loans-assigned')
                </div>
            </div>
    </section>
@endsection
@section('scripts')
    <script>
        $().ready(function () {

            $('#loans').DataTable({
                "ordering": true,
                columnDefs: [{
                    orderable: false, targets: "no-sort"
                }],
                "aaSorting": []
            });


            {{--@include('shared.user.user-dashboard-data')--}}

            // escape key press
            //        $(document).keyup(function (e) {
            //            if (e.keyCode == 27) { // escape key maps to keycode `27`
            //                $("#edit-modal").removeClass("is-active");
            //                $("#destroy-modal").removeClass("is-active");
            //            }
            //        });

            // GENERAL MODAL
            $(".modal-close").click(function () {
                $("#edit-modal").removeClass("is-active");
                $("#destroy-modal").removeClass("is-active");
            });

            // CLOSE EDIT MODAL
            $(".cancel-modal").click(function (event) {
                event.preventDefault();
                $("#edit-modal").removeClass("is-active");
                $("#destroy-modal").removeClass("is-active");
                return false;
            });

            // EDIT PARTNER
            $(".edit-partner").click(function () {
                $("#edit-modal").addClass("is-active");
            });

            // EDIT PARTNER
            $("#edit-partner").submit(function (event) {
                event.preventDefault();
                $.ajax({
                    type: 'put',
                    data: $('#edit-partner').serialize(), // Remember that you need to have your csrf token included
                    success: function (result) {
                        $("#edit-modal").removeClass("is-active");
                        location.reload(true);
                        $('body').animate({scrollTop: 0}, 10);
                    },
                    error: function (result) {
                        $("#edit-modal").removeClass("is-active");
                    }
                });
            });

            // DESTROY PARTNER
            $(".destroy-partner").click(function () {
                $("#destroy-modal").addClass("is-active");
            });

            // DESTROY PARTNER
            $("#destroy-partner").submit(function (event) {
                event.preventDefault();
                $.ajax({
                    type: 'delete',
                    data: $('#destroy-partner').serialize(), // Remember that you need to have your csrf token included
                    success: function (result) {
                        $("#destroy-modal").removeClass("is-active");
                        window.location = '/users';
                        //location.reload(true);
                        //$('body').animate({scrollTop: 0}, 10);
                    },
                    error: function (result) {
                        $("#destroy-modal").removeClass("is-active");
                    }
                });
            });
        })
        ;
    </script>
@endsection