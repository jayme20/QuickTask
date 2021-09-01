@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong>Your appointments</strong>
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                            Create Schedule
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Your Schedule</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="schedule-form" action="{{route('schedules.store')}}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="inputDate">Date</label>
                                                <input type="date" name="date" class="form-control">
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputStartTime">Start Time</label>
                                                    <input type="time" name="start_time" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputFinishTime">Finish Time</label>
                                                    <input type="time"  name="finish_time" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <select
                                                        class="form-select form-select-sm"
                                                        aria-label=".form-select-sm example"
                                                        name="duration">
                                                        <option selected="false">Session Duration</option>
                                                        <option value="30">30 Min</option>
                                                        <option value="60">60 Min</option>
                                                    </select>
                                                </div>
                                                <hr />
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Schedule</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                       <h1>name</h1>
                       <p>Reason</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    <hr/>--}}

@endsection
