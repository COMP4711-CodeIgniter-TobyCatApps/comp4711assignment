<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        {items}
        <li data-target="#myCarousel" class="{extraclasses}" ></li>
        {/items}
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        {items}
        <div align="center" class="item {extraclasses}">
            <img src="{imgsrc}" alt="{imgalt}">
        </div>
        {/items}
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
