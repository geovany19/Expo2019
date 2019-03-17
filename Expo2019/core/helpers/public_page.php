<?php
class Public_page{
    public static function header($title){
        print('
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <!--Import Google Icon Font-->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <!--Import materialize.css-->
            <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css"  media="screen,projection"/>
            <title>'.$title.'</title>
        </head>
        <body>
        <nav class="green">
            <div class="nav-wrapper">
            <a href="#!" class="brand-logo">Logo</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="sass.html">Sass</a></li>
                <li><a href="badges.html">Components</a></li>
                <li><a href="collapsible.html">Javascript</a></li>
                <li><a href="mobile.html">Mobile</a></li>
            </ul>
            </div>
        </nav>
        <ul id="nav-mobile" class="sidenav sidenav-fixed" style="transform: translateX(0px);">
        <li class="logo"><a id="logo-container" href="/" class="brand-logo">
            <object id="front-page-logo" type="image/svg+xml" data="res/materialize.svg">Your browser does not support SVG</object></a></li>
        <li class="version"><a href="#" data-target="version-dropdown" class="dropdown-trigger">
            1.0.0
            <svg class="caret" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"></path><path d="M0 0h24v24H0z" fill="none"></path></svg></a><ul id="version-dropdown" class="dropdown-content" tabindex="0">
            <li tabindex="0"><a>1.0.0</a></li>
            <li tabindex="0"><a href="http://archives.materializecss.com/0.100.2/">0.100.2</a></li>
          </ul>
          
        </li>
        <li class="search">
          <div class="search-wrapper">
            <input id="search" placeholder="Search"><i class="material-icons">search</i>
            <div class="search-results"></div>
          </div>
        </li>
        <li class="bold"><a href="about.html" class="waves-effect waves-teal">About</a></li>
        <li class="bold"><a href="getting-started.html" class="waves-effect waves-teal">Getting Started</a></li>
        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li class="bold"><a class="collapsible-header waves-effect waves-teal" tabindex="0">CSS</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="color.html">Color</a></li>
                  <li><a href="grid.html">Grid</a></li>
                  <li><a href="helpers.html">Helpers</a></li>
                  <li><a href="media-css.html">Media</a></li>
                  <li><a href="pulse.html">Pulse</a></li>
                  <li><a href="sass.html">Sass</a></li>
                  <li><a href="shadow.html">Shadow</a></li>
                  <li><a href="table.html">Table</a></li>
                  <li><a href="css-transitions.html">Transitions</a></li>
                  <li><a href="typography.html">Typography</a></li>
                </ul>
              </div>
            </li>
            <li class="bold"><a class="collapsible-header waves-effect waves-teal" tabindex="0">Components</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="badges.html">Badges</a></li>
                  <li><a href="buttons.html">Buttons</a></li>
                  <li><a href="breadcrumbs.html">Breadcrumbs</a></li>
                  <li><a href="cards.html">Cards</a></li>
                  <li><a href="collections.html">Collections</a></li>
                  <li><a href="floating-action-button.html">Floating Action Button</a></li>
                  <li><a href="footer.html">Footer</a></li>
                  <li><a href="icons.html">Icons</a></li>
                  <li><a href="navbar.html">Navbar</a></li>
                  <li><a href="pagination.html">Pagination</a></li>
                  <li><a href="preloader.html">Preloader</a></li>
                </ul>
              </div>
            </li>
            <li class="bold"><a class="collapsible-header waves-effect waves-teal" tabindex="0">JavaScript</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="auto-init.html">Auto Init</a></li>
                  <li><a href="carousel.html">Carousel</a></li>
                  <li><a href="collapsible.html">Collapsible</a></li>
                  <li><a href="dropdown.html">Dropdown</a></li>
                  <li><a href="feature-discovery.html">FeatureDiscovery</a></li>
                  <li><a href="media.html">Media</a></li>
                  <li><a href="modals.html">Modals</a></li>
                  <li><a href="parallax.html">Parallax</a></li>
                  <li><a href="pushpin.html">Pushpin</a></li>
                  <li><a href="scrollspy.html">Scrollspy</a></li>
                  <li><a href="sidenav.html">Sidenav</a></li>
                  <li><a href="tabs.html">Tabs</a></li>
                  <li><a href="toasts.html">Toasts</a></li>
                  <li><a href="tooltips.html">Tooltips</a></li>
                  <li><a href="waves.html">Waves</a></li>
                </ul>
              </div>
            </li>
            <li class="bold"><a class="collapsible-header waves-effect waves-teal" tabindex="0">Forms</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="autocomplete.html">Autocomplete</a></li>
                  <li><a href="checkboxes.html">Checkboxes</a></li>
                  <li><a href="chips.html">Chips</a></li>
                  <li><a href="pickers.html">Pickers</a></li>
                  <li><a href="radio-buttons.html">Radio Buttons</a></li>
                  <li><a href="range.html">Range</a></li>
                  <li><a href="select.html">Select</a></li>
                  <li><a href="switches.html">Switches</a></li>
                  <li><a href="text-inputs.html">Text Inputs</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </li>
        <li class="bold"><a href="mobile.html" class="waves-effect waves-teal">Mobile</a></li>
        <li class="bold active"><a href="showcase.html" class="waves-effect waves-teal">Showcase</a></li>
        <li class="bold"><a href="themes.html" class="waves-effect waves-teal">Themes<span data-badge-caption="updated" class="new badge"></span></a></li>
      </ul>
        ');
    }

    public static function footer(){
        print('
                <footer class="page-footer green">
                <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                    <h5 class="white-text">Footer Content</h5>
                    <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Links</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                    </ul>
                    </div>
                </div>
                </div>
                <div class="footer-copyright">
                <div class="container">
                © 2014 Copyright Text
                <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
                </div>
                </div>
            </footer>
            <!--JavaScript at end of body for optimized loading-->
            <script type="text/javascript" src="../../resources/js/jquery-3.2.1.min.js"></script>
            <script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
            <script type="text/javascript" src="../../resources/js/public.js"></script>
        </body>
        </html>
        ');
    }
}
?>