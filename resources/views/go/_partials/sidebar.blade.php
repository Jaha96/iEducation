<div id="leftSide">
    <nav class="leftNav scrollable">
        <ul>
            <li class="{{ Request::segment('2') === null ? 'active' : '' }}">
                <a href="/go">
                    <span class="navIcon icon-screen-desktop"></span>
                    <span class="navLabel">Самбар</span>
                </a>
            </li>
            <li>
                <a href="/go">
                    <span class="navIcon icon-envelope"></span>
                    <span class="navLabel">И-мэйл</span>
                </a>
            </li>
            <li>
                <a href="/go/media/slider">
                    <span class="navIcon icon-control-play"></span>
                    <span class="navLabel">Медиа</span>
                </a>
            </li>
            <li>
                <a href="/go/content/crud">
                    <span class="navIcon icon-plus"></span>
                    <span class="navLabel">Контент</span>
                </a>
            </li>
            <li class="{{ Request::segment('2') === 'user' ? 'active' : '' }}">
                <a href="/go/user/crud">
                    <span class="navIcon icon-user"></span>
                    <span class="navLabel">Хэрэглэгч</span>
                </a>
            </li>
            <li class="{{ Request::segment('2') === 'auto' ? 'active' : '' }}">
                <a href="/go/auto/autoparts">
                    <span class="navIcon icon-wrench"></span>
                    <span class="navLabel">Сэлбэг</span>
                </a>
            </li>
            <li class="{{ Request::segment('2') === 'search' ? 'active' : '' }}">
                <a href="/go/search">
                    <span class="navIcon icon-magnifier"></span>
                    <span class="navLabel">Хайлт</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="sidebar-bottom">
        <ul>
            <li class="divider"></li>
            <li class="{{ Request::segment('2') === 'system' ? 'active' : '' }}">
                <a href="/go/system/info" title="тохиргоо">
                    <span class="navIcon icon-settings"></span>
                    <span class="navLabel">Тохиргоо</span>
                </a>
            </li>
            <li class="divider"></li>
            <li class="power">
                <a href="/logout" title="гарах">
                    <span class="navIcon icon-power"></span>
                    <span class="navLabel">Гарах</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="closeLeftSide"></div>