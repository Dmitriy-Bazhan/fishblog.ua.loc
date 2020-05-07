<ul class="live-search--container" style="background-color: #fff;">
    @foreach($products as $product)
        <li class="live-search__wrapp jsLink" data-href="{{ url_with_locale($product->alias->url) }}">

            @if (file_exists( (public_path().'/storage/product/' . $product->sku . '.jpg') ))

                <img class="live-search__wrapp--img" src="/storage/product/{{ $product->sku }}.jpg" alt="{{ $product->name }}">

            @else

                <img class="live-search__wrapp--img" src="/img/no-img.png" alt="{{ $product->name }}">

            @endif

            <span class="live-search__wrapp--title" >{{ $product->name }}</span>

        </li>
    @endforeach
</ul>
