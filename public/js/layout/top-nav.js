
(function () {

    $(document).ready(function () {
        setCurrentActiveLink();
    });

    function setCurrentActiveLink() {

        resetNavItemsActiveStatus();
        var $navItem = findCurrentNavItem();

        if ($navItem) {
            $navItem.addClass("active");
        }

    }

    function findCurrentNavItem() {
        var currentNavItem = null;
        var currentHref = location.href;
        $('#navbar-link-container li a').each(function () {

            //  "" + to make sure this is a string
            var linkHref = "" + $(this).attr('href');

            if (currentHref.startsWith(linkHref)) {
                currentNavItem = $(this).parent();
            }

        });

        return currentNavItem;
    }

    function resetNavItemsActiveStatus() {

        $('#navbar-link-container li').removeClass('active');

    }

})();
