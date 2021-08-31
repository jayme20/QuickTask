@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Book Appointment with a Doctor') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <form id="appointmentForm" action="{{ route('appointments.store') }}" method="POST">
                            @csrf
                           <div class="row">
                                <div class="col">
                                    <select class="form-control" name="date" id="date">
                                        <option selected="false">Date</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-control" name="time" id="time">
                                        <option selected="false">Time</option>
                                    </select>
                                </div>
                          </div>
                          <hr />
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="phone">Phone:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone number">
                                </div>
                          </div>
                            <hr />
                          <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Appointment Reason(s)</label>
                                <textarea class="form-control" name="reason" id="exampleFormControlTextarea1" rows="3"></textarea>
                          </div>
                            <button type="submit" class="btn btn-primary">Book Appointment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
