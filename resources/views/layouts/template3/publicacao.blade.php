@extends('layouts.template3')
@push('script')
<script>

</script>
@endpush
@section('content')
<!-- ##### Blog Area Start ##### -->
<div class="faith-blog-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center mx-auto">
                    <h3>Publicação: {{$publicacao->nome}}</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12" id="html-append">
                <?php echo $publicacao->html; ?>
            </div>
        </div>
    </div>
</div>
<!-- ##### Blog Area End ##### -->
@endsection