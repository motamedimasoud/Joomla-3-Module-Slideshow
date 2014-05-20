jQuery(function()
{
    jQuery('.carousel').jcarousel
    ({

    });

    jQuery('.icon-arrow-left').jcarouselControl(
    {
        target: '-=1'
    });

    jQuery('.icon-arrow-right').jcarouselControl(
    {
        target: '+=1'
    });
});