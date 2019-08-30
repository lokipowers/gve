<footer class="footer">
  <div class="container-fluid">
      <div class="copyright float-left">
          <small>Logged in as: {{ $currentUser->email }}</small>
      </div>

    <!--<nav class="float-left">
      <ul>
        <li>
          <a href="https://www.creative-tim.com">
              {{ __('Creative Tim') }}
          </a>
        </li>
        <li>
          <a href="https://creative-tim.com/presentation">
              {{ __('About Us') }}
          </a>
        </li>
        <li>
          <a href="http://blog.creative-tim.com">
              {{ __('Blog') }}
          </a>
        </li>
        <li>
          <a href="https://www.creative-tim.com/license">
              {{ __('Licenses') }}
          </a>
        </li>
      </ul>
    </nav>-->
    <div class="copyright float-right">
        <small>&copy; {{ Date('Y') }}, GVE.World</small>
    </div>
  </div>
</footer>
