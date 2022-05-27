<div class="form-group">
    <label class="form-label">{{$fieldLabel}}</label>
    <input type="{{$fieldType}}" class="form-control" name="{{$fieldName}}" value="{{isset($fieldValue)?$fieldValue:old($fieldName)}}" placeholder="{{$fieldLabel}}" required/>
    <x-form-error-message :field-name="$fieldName" />
</div>
