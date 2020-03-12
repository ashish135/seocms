@extends('superadmin.layouts.dashboard')


@section('section')
	<div id="exTab2">	
<ul class="nav nav-tabs">
			<li class="active">
        <a  href="#1" data-toggle="tab">Overview</a>
			</li>
			<li><a href="#2" data-toggle="tab">Task</a>
			</li>
			<li><a href="#3" data-toggle="tab">Competion</a>
			</li>
			<li><a href="#4" data-toggle="tab">Note</a>
			</li>
		</ul>
	<div class="tab-content ">
		<div class="tab-pane active" id="1">
          <div class="row">
          	 <div class="form-group col-md-6">
                <label for="sel1">Project</label>
                <input type="text" value="{{ $lead->Project }}" disabled class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="sel1">Region</label>
                <input type="text" value="{{ $lead->Project }}" disabled class="form-control">
            </div>
            <div class="form-group col-md-6">
              <label for="sel1">Main Category</label>
               <input type="text" class="form-control" value="{{ $lead->Project }}" disabled> 
            </div>
            <div class="form-group col-md-6">
              <label for="sel1">Sub Category</label>
               <input type="text" class="form-control" value="{{ $lead->Project }}" disabled> 
            </div>
            <div class="form-group col-md-6">
              <label for="sel1">Keyword</label>
               <input type="text" class="form-control" value="{{ $lead->Project }}" disabled> 
            </div>
            <div class="form-group col-md-6">
              <label for="sel1">Activity Type</label>
              <input type="text" class="form-control" value="{{ $lead->Project }}" disabled>  
            </div>
            <div class="form-group col-md-6">
              <label for="sel1">Location</label>
               <input type="text" class="form-control" value="{{ $lead->Project }}" disabled> 
            </div>
            <div class="form-group col-md-6">
              <label for="usr">Targeted URL</label>
              <input type="text" class="form-control" value="{{$lead->Targeted_URL}}" disabled>
            </div>
            <div class="form-group col-md-6">
              <label for="usr">URL After Submission</label>
              <input type="text" class="form-control" value="{{$lead->URL_After_Submission}}" disabled>
            </div>
            <div class="form-group col-md-6">
              <label for="usr">DA</label>
              <input type="text" class="form-control"  value="{{ $lead->DA }}" disabled>
            </div>
            <div class="form-group col-md-6">
              <label for="usr">PA</label>
              <input type="text" class="form-control" value="{{ $lead->PA }}" disabled>
            </div>
            <div class="form-group col-md-6">
              <label for="usr">SS</label>
              <input type="text" class="form-control" value="{{ $lead->SS }}" disabled>
            </div>
            <div class="form-group col-md-6">
              <label for="usr">Username</label>
              <input type="text" class="form-control" value="{{ $lead->Username }}" disabled>
            </div>
            <div class="form-group col-md-6">
              <label for="usr">Password</label>
              <input type="text" class="form-control"  value="{{ $lead->Password }}" disabled>
            </div>
            <div class="form-group col-md-6">
              <label for="usr">Email</label>
              <input type="text" class="form-control" value="{{ $lead->Email }}" disabled>
            </div>
            <div class="form-group col-md-6">
              <label for="usr">Status</label>
              <input type="text" class="form-control" value="{{ $lead->Status }}" disabled>
            </div>
          </div>
		</div>
		<div class="tab-pane" id="2">
          	<div class="row">
              <div class="col-md-6">
                <h3 class="heading">List of task</h3>
              </div>
              <div class="col-md-6 text-right">
                <button  type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#favoritesModal">Add to Task</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <table class="tasktable">
                  <thead>
                    <tr>
                      <th>Task</th>
                      <th>Discription</th>
                      <th>Assign Date</th>
                      <th>Target Date</th>
                      <th>Complete Date</th>
                      <th>Assign To</th>
                      <th>Status</th>
                      <th>Action <br>(Tick If complete)</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Task</th>
                      <th>Discription</th>
                      <th>Assign Date</th>
                      <th>Target Date</th>
                      <th>Complete Date</th>
                      <th>Assign To</th>
                      <th>Status</th>
                      <th>Action <br>(Tick If complete)</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach( $tasks as $task)
                    <tr>
                      <td>{{ $task->taskname }}</td>
                      <td>{{ $task->taskdiscription }}</td>
                      <td>{{ $task->assign_date }}</td>
                      <td>{{ $task->target_date }}</td>
                      <td><?php if($task->completion_date) { ?>
                      {{ $task->completion_date }}
                    <?php } else { ?>
                        Not Complete Yet
                      <?php } ?>
                      </td>
                      <td>{{ $task->users_id }}</td>
                      <td>{{ $task->status }}</td>
                      <td align="center">
                      <?php
                        if (auth('admin')->user()->id == $task->users_id) {
                      ?>

                        <input type="checkbox" id="statuschange"></td>
                      <?php } ?>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
      <div class="modal fade" id="favoritesModal" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="favoritesModalLabel">Create Task</h4>
            </div>
            <div class="modal-body">
              <div class="success-msg">
                <div id="sucsa">Task Ceated</div>
              </div>
              <form >

                  <div class="form-group">

                      <label>Task</label>

                      <input type="text" name="task" class="form-control" placeholder="Name" required="">

                  </div>

                  <div class="form-group">

                      <label>Task Description</label>

                      <input type="text" name="tskdescription" class="form-control" placeholder="Password" required="">

                  </div>

                  <div class="form-group">

                      <strong>Target Date</strong>

                      <input type="date" name="tdate" class="form-control" placeholder="Email" required="">

                  </div>
                  <div class="form-group">

                      <strong>Status</strong>

                      <select class="form-control" name="status">
                        <option value="Assigned">Assigned</option>
                        <option value="Working">Working</option>
                        <option value="Complete">Complete</option>
                      </select>

                  </div>
                  <div class="form-group">

                      <strong>Assign To</strong>
                      <select class="form-control" name="users_id">
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                      </select>

                  </div>
                  <input type="hidden" name="leads_id" value="{{ $lead->id }}">
                  <div class="form-group">

                      <button class="btn btn-success btn-submit">Submit</button>

                  </div>

              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
        </div>

		</div>
    <div class="tab-pane" id="3">
        
		</div>
		<div class="tab-pane" id="4">
          <div class="row">
              <div class="col-md-6">
                <h3 class="heading">List of Note</h3>
              </div>
              <div class="col-md-6 text-right">
                <button  type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#noteModal">Add Note</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <table class="tasktable">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Note</th>
                      <th>Created By</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>S.No</th>
                      <th>Note</th>
                      <th>Created By</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $i = 1; ?>
                    @foreach( $note as $not)
                    <tr>
                      <td align="center">{{ $i++ }}</td>
                      <td>{{ $not->note }}</td>
                      <td>{{ $not->users_id }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
        <div class="modal fade" id="noteModal" tabindex="-1" role="dialog" aria-labelledby="noteModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="favoritesModalLabel">Create Note</h4>
              </div>
              <div class="modal-body">
                <div class="success-msg">
                  <div id="sucsa">Note Added</div>
                </div>
                <form >
                    <div class="form-group">
                        <label>Note</label>
                       <textarea class="form-control" name="note" rows="5" cols="50"></textarea>
                    </div>       
                    <input type="hidden" name="leads_id" value="{{ $lead->id }}">
                    <input type="hidden" name="users_id" value="{{ auth('admin')->user()->id }}">
                    <div class="form-group">
                        <button class="btn btn-success btn-submit-note">Submit</button>
                    </div>

                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
		</div>
	</div>
</div>



@stop