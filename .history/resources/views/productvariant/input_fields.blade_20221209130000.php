<div class="row ">
    <div class="col-md-6">
        {{ Form::label('name','Product Variant Name', ['class' => 'control-label']) }} <span
            style="color: rgb(228,49,112);font-size: 20px;">*</span>
        {{ Form::text('variant_name', null, ['class' => 'form-control','placeholder'=> 'Product Variant Name']) }}
    </div>
    <div class="col-md-6">
        {{ Form::label('name', 'Select Product Variant Group', ['class' => 'control-label']) }} <span
            style="color: rgb(255, 255, 255);font-size: 20px;">*</span>
        {!! Form::select('variantgroup', $variantgroup, $selectedVariantgroup, ['class' => 'selectpicker form-control '
        ,'data-style'=>'btn btn-primary btn-round','data-live-search'=>'true','tabindex' =>'-98']) !!}
    </div>
</div>
<br>

<div class="row">
    <div class="col-lg-12">
        <button type="submit" class="btn btn-primary btn-rose pull-right "> {{ Str::lower($btn_action_title) == 'add' ?
            'Add Product Variant Group' : 'Update Product Variant' }} </button>
    </div>
</div>

<div class="clearfix"></div>