/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens
 */
( function() {
    const siteNavigation = document.getElementById( 'site-navigation' );

    // Return early if the navigation doesn't exist
    if ( ! siteNavigation ) {
        return;
    }

    const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];

    // Return early if the menu is empty
    if ( ! menu || menu.classList === undefined ) {
        return;
    }

    // Create mobile menu button if menu exists
    const button = document.createElement( 'button' );
    button.className = 'menu-toggle';
    button.setAttribute( 'aria-controls', 'primary-menu' );
    button.setAttribute( 'aria-expanded', 'false' );
    button.innerHTML = '<span class="menu-icon"></span>';

    siteNavigation.insertBefore( button, menu );

    // Toggle menu visibility
    button.addEventListener( 'click', function() {
        const isExpanded = button.getAttribute( 'aria-expanded' ) === 'true';
        button.setAttribute( 'aria-expanded', ! isExpanded );
        menu.classList.toggle( 'toggled' );
    } );

    // Close menu when clicking outside
    document.addEventListener( 'click', function( event ) {
        const isClickInside = siteNavigation.contains( event.target );
        if ( ! isClickInside && menu.classList.contains( 'toggled' ) ) {
            button.setAttribute( 'aria-expanded', 'false' );
            menu.classList.remove( 'toggled' );
        }
    } );

    // Handle keyboard navigation
    const links = menu.querySelectorAll( 'a' );
    links.forEach( function( link ) {
        link.addEventListener( 'focus', function() {
            let parent = link.parentElement;
            while ( parent && parent !== menu ) {
                if ( parent.tagName === 'LI' ) {
                    parent.classList.add( 'focus' );
                }
                parent = parent.parentElement;
            }
        } );

        link.addEventListener( 'blur', function() {
            let parent = link.parentElement;
            while ( parent && parent !== menu ) {
                if ( parent.tagName === 'LI' ) {
                    parent.classList.remove( 'focus' );
                }
                parent = parent.parentElement;
            }
        } );
    } );
}() );
