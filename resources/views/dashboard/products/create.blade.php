@extends('layouts.dashboard.app')

@section('content')

  <section class="content-header">
    <div class="content-wrapper">

      <section class="content-header">
          <h1>@lang('site.products')</h1>

          <ol class="breadcrumb">
              <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
              <li><a href="{{ route('dashboard.products.index') }}"> @lang('site.products')</a></li>
              <li class="active">@lang('site.add')</li>
          </ol>
      </section>

      <section class="content">

          <div class="box box-primary">

              <div class="box-header">
                  <h3 class="box-title">@lang('site.add')</h3>
              </div><!-- end of box header -->

              <div class="box-body">

                  <form action="{{ route('dashboard.products.store') }}" method="post" enctype="multipart/form-data">

                    @csrf

                    <div class="box box-primary">

                        <div class="box-header with-border">

                            <h3 class="box-title">@lang('site.add')</h3>

                        </div><!-- end of box header -->

                        <div class="box-body ">

                            @include('partials._errors')

                            {{-- category --}}
                            <div class="form-group">
                                <label>@lang('site.categories')</label>
                                <select name="category_id" class="form-control select2">
                                    <option value="">----</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @foreach (config('translatable.locales') as $locale)

                                <div class="form-group">
                                    <label>@lang('site.' . $locale . '.name')</label>
                                    <input type="text" name="{{ $locale }}[name]" class="form-control" value="{{ old($locale . '.name') }}">
                                </div>

                                <div class="form-group">
                                    <label>@lang('site.' . $locale . '.description')</label>
                                    <textarea name="{{ $locale }}[description]" class="form-control">{{ old($locale . '.description') }}</textarea>
                                </div>

                            @endforeach

                            {{--image--}}
                            <div class="form-group">
                                <label>@lang('site.image')</label>
                                <input type="file" name="image" class="form-control image">
                            </div>

                            {{--purchase price--}}
                            <div class="form-group">
                                <label>@lang('site.purchase_price')</label>
                                <input type="number" name="purchase_price" class="form-control" value="{{ old('purchase_price') }}" min="1">
                            </div>

                            {{--sale price--}}
                            <div class="form-group">
                                <label>@lang('site.sale_price')</label>
                                <input type="number" name="sale_price" class="form-control" value="{{ old('sale_price') }}" min="1">
                            </div>

                            {{--stock--}}
                            <div class="form-group">
                                <label>@lang('site.stock')</label>
                                <input type="number" name="stock" class="form-control" value="{{ old('stock') }}">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
                            </div>

                        </div><!-- end of box body -->

                    </div><!-- end of box -->

            </form><!-- end of form -->


              </div><!-- end of box body -->

          </div><!-- end of box -->

      </section><!-- end of content -->

  </div><!-- end of content wrapper -->

@endsection