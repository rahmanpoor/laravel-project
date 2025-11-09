<!-- start footer -->
<footer class="footer">
    <section class="container-xxl my-4">
        <section class="row">
            <section class="col">
                <section class="footer-shop-features d-md-flex justify-content-md-around align-items-md-center">

                    @foreach ($footerFeatures as $footerFeature)
                        <section class="footer-shop-features-item">
                            <img src="{{ asset($footerFeature->image) }}" alt="{{ $footerFeature->title }}">
                            <section class="text-center">{{ $footerFeature->title }}</section>
                        </section>
                    @endforeach

                </section>
            </section>
        </section>
        <section class="row">
            <section class="col-md">
                @foreach ($firstColumnLinks as $link)
                    <section><a class="text-decoration-none text-muted d-inline-block my-2"
                            href="{{ $link->url }}">{{ $link->title }}</a></section>
                @endforeach
            </section>

            <section class="col-md">
                @foreach ($secondColumnLinks as $link)
                    <section><a class="text-decoration-none text-muted d-inline-block my-2"
                            href="{{ $link->url }}">{{ $link->title }}</a></section>
                @endforeach
            </section>

            <section class="col-md">
                @foreach ($thirdColumnLinks as $link)
                    <section><a class="text-decoration-none text-muted d-inline-block my-2"
                            href="{{ $link->url }}">{{ $link->title }}</a></section>
                @endforeach
            </section>

            <section class="col-md-5">
                <section>
                    <section class="text-dark fw-bold">همراه ما باشید!</section>
                    <section class="my-3">
                        @foreach ($footerSocials as $social)
                            <a href="{{ $social->url }}" class="text-muted text-decoration-none me-5"><i
                                    class="fab fa-{{ $social->icon }}"></i></a>
                        @endforeach

                    </section>
                    {{-- شروع نماد  --}}
                    <section class="d-flex align-items-center gap-3 flex-wrap">
                        @foreach ($footerBadges as $badge)

                            <section class="badge">
                                {!! $badge->script !!}
                            </section>
                        @endforeach
                    </section>
                    {{-- پایان نماد  --}}
                </section>
            </section>
        </section>

        <section class="row my-5">
            <section class="col">
                <section class="fw-bold">{{ $footerSetting->title }}</section>
                <section class="text-muted footer-intro">{{ $footerSetting->description }}</section>
            </section>
        </section>

        <section class="row border-top pt-4">
            <section class="col">
                <section class="text-muted footer-intro text-center">
                    {{ $footerSetting->copyright }}
                </section>
            </section>
        </section>
    </section>
</footer>
<!-- end footer -->
