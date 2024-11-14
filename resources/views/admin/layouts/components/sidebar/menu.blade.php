<li class="sidebar-title">Menu</li>
{{-- Dashboard --}}
<li class="sidebar-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
    <a href="/dashboard"  class='sidebar-link'>
    {{-- <a href="{{ route('admin.index') }}"  class='sidebar-link'> --}}
        <i class="bi bi-grid-fill"></i>
        <span>Home</span>
    </a>
</li>
{{--
@include('admin.layouts.components.sidebar.postDropdown')
@include('admin.layouts.components.sidebar.galleryDropdown')
@include('admin.layouts.components.sidebar.masterDropdown') --}}


{{-- teacher --}}
{{-- <li class="sidebar-item {{ Request::is('admin/perumahan*') || Request::is('admin/createPerumahan*') || Request::is('admin/editPerumahan*') || Request::is('admin/showPerumahan*') ? 'active' : '' }}"> --}}
<li class="sidebar-item">
    <a href="/absensi" class='sidebar-link'>
        <i class="bi bi-person-vcard-fill"></i>
        <span>Absensi</span>
    </a>
</li>
{{-- konsumen --}}
<li class="sidebar-item ">
    <a href="/students" class='sidebar-link'>
        <i class="bi bi-journal-album"></i>
        <span>Mahasiswa</span>
    </a>
</li>

{{-- Student --}}
<li class="sidebar-item">
    <a href="/divisi" class='sidebar-link'>
        <i class="bi bi-person-rolodex"></i>
        <span>Divisi</span>
    </a>
</li>

<li class="sidebar-item">
    <a href="/college" class='sidebar-link'>
        <i class="bi bi-person-rolodex"></i>
        <span>Kampus</span>
    </a>
</li>
{{-- announce --}}

<li class="sidebar-item">
    <form method="POST" action="/logout" id="logout">
        @csrf
        <a href="" class='sidebar-link'>
            <i class="bi bi-box-arrow-left text-danger"></i>
            <span>Logout</span>
        </a>
    </form>
</li>
