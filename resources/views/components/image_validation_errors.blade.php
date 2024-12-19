@props(['errors'])

@if($errors->any())
    <div {{$attributes}}>
        
            <ul class="mt-3 list-disc list-inside text-md text-red-600">
                <!-- @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach -->

                @if(empty($errors->first('image')))
                    <p>画像があれば、再度選択してください。</p>
                @endif
            </ul>
    </div>
@endif