<div class="main-middle__container">
    <div class="main-middle__buttons-container">
        <a href="" class="main-middle__buttons">
            مراكز
        </a>
        <a href="" class="main-middle__buttons">
            سكن
        </a>
        <a href="" class="main-middle__buttons">
            الكل
        </a>
        <a href="" class="main-middle__buttons main-middle__search-btn">
            <span>
                أطلب سكن
            </span>
            <i class="fa fa-search"></i>
        </a>
    </div>
    <div id="map" class="map pb-3" style="height: calc(-180px + 100vh);">
        <button class="floating-btn" data-toggle="modal" data-target="#myModal">
            <img src="assets/images/stream-signal.png" alt="stream-signal-image" width="35" height="30">
            <br>أطلب <br>سكن
        </button>
        <div class="ol-viewport ol-touch" style="position: relative; overflow: hidden; width: 100%; height: 100%;">
            <div class="ol-unselectable ol-layers" style="position: absolute; width: 100%; height: 100%; z-index: 0;">
                <div class="ol-layer" style="position: absolute; width: 100%; height: 100%;">
                    <canvas width="702" height="942"
                        style="position: absolute; left: 0px; transform-origin: left top; transform: matrix(0.5, 0, 0, 0.5, 0, 0);">
                    </canvas>
                </div>
            </div>
            <div class="ol-overlaycontainer"
                style="position: absolute; z-index: 0; width: 100%; height: 100%; pointer-events: none;"></div>
            <div class="ol-overlaycontainer-stopevent"
                style="position: absolute; z-index: 0; width: 100%; height: 100%; pointer-events: none;">
                <div class="ol-zoom ol-unselectable ol-control" style="pointer-events: auto;"><button class="ol-zoom-in"
                        type="button" title="Zoom in">+</button><button class="ol-zoom-out" type="button"
                        title="Zoom out">–</button></div>
                <div class="ol-rotate ol-unselectable ol-control ol-hidden" style="pointer-events: auto;"><button
                        class="ol-rotate-reset" type="button" title="Reset rotation"><span class="ol-compass"
                            style="transform: rotate(0rad);">⇧</span></button></div>
                <div class="ol-attribution ol-unselectable ol-control ol-uncollapsible" style="pointer-events: auto;">
                    <button type="button" aria-expanded="true" title="Attributions"><span
                            class="ol-attribution-collapse">›</span></button>
                    <ul>
                        <li>© <a href="https://www.openstreetmap.org/copyright" target="_blank">OpenStreetMap</a>
                            contributors.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
