
@session('success')
<div id="alertDiv" class="mb-4 mt-4 flex items-center rounded-lg border border-green-300 bg-green-50 p-4 text-sm text-green-800" role="alert">
    <span class="sr-only">Sucesso</span>
    <div>
        <span class="font-medium">Sucesso!</span> {{ $value }}
    </div>
</div>
@endsession

@session('error')
<div id="alertDiv" class="mb-4 mt-4 flex items-center rounded-lg border border-red-300 bg-red-50 p-4 text-sm text-red-800" role="alert">
    <span class="sr-only">Não Autorizado</span>
    <div>
        <span class="font-medium">Não Autorizado!</span> {{ $value }}
    </div>
</div>
@endsession