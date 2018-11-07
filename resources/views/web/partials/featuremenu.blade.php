<ul class="side-bar-list">

 <li>
  <a href="{{ route('portal') }}"  class="{{ request()->is('clientportal') ? 'active' : '' }}">
  {{ __("Client Portal") }}</a>
</li>

<li>
  <a href="services-detail.html">
  {{ __("Supported Products") }}</a>
</li>

<li>
  <a href="services-detail.html">
  {{ __("Trading Features") }}</a>
</li>
<li>
  <a href="services-detail.html">
  {{ __("Advanced Analysis") }}</a>
</li>
<li>
  <a href="services-detail.html">
  {{ __("Wealth Management") }}</a>
</li>
</ul>
