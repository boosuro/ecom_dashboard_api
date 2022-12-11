<div class="row ">
    <div class="col-md-6">
        {{ Form::label('name','Product Name', ['class' => 'control-label']) }} <span
            style="color: rgb(228,49,112);font-size: 20px;">*</span>
        {{ Form::text('name', null, ['class' => 'form-control','placeholder'=> 'Product Name']) }}
    </div>
    <div class="col-md-6">
        {{ Form::label('name','Product Price', ['class' => 'control-label']) }} <span
            style="color: rgb(228,49,112);font-size: 20px;">*</span>
        {{ Form::text('price', null, ['class' => 'form-control','placeholder'=> 'Product Price']) }}
    </div>
</div>
<div class="row ">
    <div class="col-md-6">
        {{ Form::label('name','Quantity', ['class' => 'control-label']) }} <span
            style="color: rgb(228,49,112);font-size: 20px;">*</span>
        {{ Form::text('quantity', null, ['class' => 'form-control','placeholder'=> 'Quantity']) }}
    </div>
    <div class="col-md-6">
        {{ Form::label('name', 'Select All Product Variants', ['class' => 'control-label']) }} <span
            style="color: rgb(228,49,112);font-size: 20px;">*</span>
        {!! Form::select('productvariants[]', $product_variants, $selected_product_variants, ['class' =>
        'selectpicker
        form-control '
        ,'data-style'=>'btn btn-primary btn-round','multiple'=>'multiple','data-live-search'=>'true','tabindex'
        =>'-98'])
        !!}
    </div>
</div>
<div class="row ">
    <div class="col-md-6">
        {{ Form::label('name', trans('Cover Image'), ['class' => 'control-label']) }}
        <input type="file" class="dropify" name="image" data-default-file="{{ $imageUrl }}" />
    </div>
</div>
<br>

<div class="row">
    <div class="col-lg-12">
        <button type="submit" class="btn btn-primary btn-rose pull-right "> {{ Str::lower($btn_action_title) ==
            'add' ?
            'Add Product' : 'Update Product' }} </button>
    </div>
</div>

<div class="clearfix"></div>