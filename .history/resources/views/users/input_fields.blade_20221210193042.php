<div class="row ">
    <div class="col-md-6">
        {{ Form::label('name','Name', ['class' => 'control-label']) }} <span
            style="color: rgb(228,49,112);font-size: 20px;">*</span>
        {{ Form::text('name', null, ['class' => 'form-control','placeholder'=> 'Name']) }}
    </div>
    <div class="col-md-6">
        {{ Form::label('name','Email', ['class' => 'control-label']) }} <span
            style="color: rgb(228,49,112);font-size: 20px;">*</span>
        {{ Form::email('price', null, ['class' => 'form-control','placeholder'=> 'Email']) }}
    </div>
</div>
<div class="row ">
    <div class="col-md-6">
        {{ Form::label('name','Password', ['class' => 'control-label']) }} <span
            style="color: rgb(228,49,112);font-size: 20px;">*</span>
        {{ Form::text('password', null, ['class' => 'form-control','placeholder'=> 'Password']) }}
    </div>
</div>
<br>

<div class="row">
    <div class="col-lg-12">
        <button type="submit" class="btn btn-primary btn-rose pull-right "> {{ Str::lower($btn_action_title) ==
            'add' ?
            'Add User' : 'Update User' }} </button>
    </div>
</div>

<div class="clearfix"></div>