<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title" style="color: white">
            Navigation
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html"
             data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li class="{{request()->is('*') ? 'nav-parent nav-active nav-expanded bg-primary' : ''}}">
                        <a class="">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                            <span >Manage Event</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class=" {{request()->is('form') ? 'nav-active' : ''}}">
                                <a href="/form">
                                    Create Event
                                </a>
                            </li>
                            <li class="{{request()->is('table') ? 'nav-active' : ''}}">
                                <a href="/table">
                                    List Event
                                </a>
                            </li>
                            <li class="{{request()->is('contact') ? 'nav-active' : ''}}">
                                <a href="/contact">
                                    Contact Event
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

</aside>
