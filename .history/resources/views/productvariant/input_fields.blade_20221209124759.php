<div class="row ">
    <div class="col-md-6">
        {{ Form::label('name','Variant Group Name', ['class' => 'control-label']) }} <span
            style="color: rgb(228,49,112);font-size: 20px;">*</span>
        {{ Form::text('variant_group_name', null, ['class' => 'form-control','placeholder'=> 'Variant Group Name']) }}
    </div>
    <div class="col-md-6">
        {{ Form::label('name', 'Description', ['class' => 'control-label']) }} <span
            style="color: rgb(255, 255, 255);font-size: 20px;">*</span>
        {{ Form::textarea('description', null, ['class' => 'form-control','rows' => 3,'placeholder'=>
        'Description']) }}
    </div>
</div>
<br>

<div class="row">
    <div class="col-lg-12">
        <button type="submit" class="btn btn-primary btn-rose pull-right "> {{ Str::lower($btn_action_title) == 'add' ?
            'Add Variant Group' : 'Update Variant Group' }} </button>
    </div>
</div>

<div class="clearfix"></div>