
@extends('layouts.admin')

@section('title', 'Change Password')

@section('header')
    <h1>Change Password</h1>
@endsection

@section('content')
<div class="section-body">
    <div id="output-status"></div>
    <div class="row">
      <div class="col-md-12">
          <div class="card" id="settings-card">
            <div class="card-header">
              <h4>Change Password</h4>
            </div>
            <form action="{{ route('change.password.post') }}" method="POST">
            @csrf
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group row align-items-center">
                        <label for="current_password" class="form-control-label col-sm-3 text-md-right">Current Password</label>
                        <div class="col-sm-6 col-md-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                      <i class="fas fa-lock"></i>
                                    </div>
                                </div>
                                <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" placeholder="Enter Current Password" required autocomplete="new-password">
                                @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                      </div>
                    <div class="form-group row align-items-center">
                        <label for="new_password" class="form-control-label col-sm-3 text-md-right">New Password</label>
                        <div class="col-sm-6 col-md-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                    </div>
                                </div>
                                <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" placeholder="Enter New Password" required autocomplete="new-password">
                                @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="new_confirm_password" class="form-control-label col-sm-3 text-md-right">Confirm New Password</label>
                        <div class="col-sm-6 col-md-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                    </div>
                                </div>
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" placeholder="Enter Confirm New Password" required autocomplete="new-password">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-whitesmoke text-md-right">
                    <button class="btn btn-primary" type="submit">Save Changes</button>
                    <button class="btn btn-danger" type="reset">Reset</button>
                </div>
            </form>
          </div>
      </div>
    </div>
</div>
@endsection
@push('script')
    <script src="{{ asset('stislaa/assets_node/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{ asset('stislaa/assets_node/codemirror/mode/javascript/javascript.js') }}"></script>
    <script src="{{ asset('stislaa/assets/js/page/features-setting-detail.js') }}"></script>
    <script src="{{ asset('stislaa/assets_node/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
    <script src="{{ asset('stislaa/assets/js/page/forms-advanced-forms.js') }}"></script>
@endpush



