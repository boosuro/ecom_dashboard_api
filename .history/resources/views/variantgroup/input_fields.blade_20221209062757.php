
<div class="row ">
    <div class="col-md-6">
       {{ Form::label('name', trans('lang.category_name'), ['class' => 'control-label']) }} <span style="color: rgb(228,49,112);font-size: 20px;">*</span>
       {{ Form::text('name', null,  ['class' => 'form-control','placeholder'=>  trans('lang.category_name')]) }}
    </div>
    <div class="col-md-6">
        {{ Form::label('name', trans('lang.description'), ['class' => 'control-label']) }} <span style="color: rgb(255, 255, 255);font-size: 20px;">*</span>
        {{ Form::textarea('description', null,  ['class' => 'form-control','rows' => 3,'placeholder'=>  trans('lang.description')]) }}
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6">
        {{ Form::label('name', trans('lang.cover_image'), ['class' => 'control-label']) }} <span style="color: rgb(228,49,112);font-size: 20px;">*</span>
        <input type="file" class="dropify"  name="image"   data-default-file="{{ $imageUrl }}" />
    </div>
    
</div>

<br>
<div class="row">
    <div class="col-lg-12">
        <button type="submit" class="btn btn-primary btn-rose pull-right " > {{ Str::lower($btn_action_title) == 'add' ? trans('lang.category_add') : trans('lang.category_update') }}  </button>
    </div>
</div>

<div class="clearfix"></div>

  