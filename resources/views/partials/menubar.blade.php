<nav class="main-nav" role="navigation">

    <!-- Mobile menu toggle button (hamburger/x icon) -->
    <input id="main-menu-state" type="checkbox" />
    <label class="main-menu-btn" for="main-menu-state">
        <span class="main-menu-btn-icon"></span> Toggle main menu visibility
    </label>

    <!-- Sample menu definition -->
    <ul id="main-menu" class="sm sm-blue">
        <li>
            <a href="{{ route('admin.dashboard.index') }}" class="active">
                <i class="icon-Layout-4-blocks">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('admin.transaction.index') }}">
                <i class="icon-Mail-notification">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>Transaction
            </a>
        </li>
    </ul>
</nav>
