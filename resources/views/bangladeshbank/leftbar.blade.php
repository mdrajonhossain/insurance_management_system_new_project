<!-- Sidebar (hidden on mobile) -->
<div class="sidebar d-none d-md-block bg-info text-white">

    <h3 style="font-size: 20px; font-weight: bold; margin-top: 60px; margin-bottom: 30px;">BD Bank</h3>
    
    <a class="text-warning hover:text-info" href="{{ url('/bank') }}"
        style="font-size: 15px; font-weight: 500; text-decoration:none; {{ Request::is('bank') ? 'background-color: #ddd; color: blue;' : '' }}">Dashboard</a>
    
    <a class="text-warning hover:text-info" href="{{ url('/bangladeshBank') }}"
        style="font-size: 15px; font-weight: 500; text-decoration:none; {{ Request::is('bangladeshBank') ? 'background-color: #ddd; color: blue;' : '' }}">FDR
        Manage</a>

    <a class="text-warning hover:text-info" href="{{ url('/bangladeshBank/bankregister') }}"
        style="font-size: 15px; font-weight: 500; text-decoration:none; {{ Request::is('bangladeshBank/bankregister') ? 'background-color: #ddd; color: blue;' : '' }}">
        Register Bank</a>
    
    <a class="text-warning hover:text-info" href="{{ url('bangladeshBank/branchlist') }}"
        style="font-size: 15px; font-weight: 500; text-decoration:none; {{ Request::is('bangladeshBank/branchlist') ? 'background-color: #ddd; color: blue;' : '' }}">Branch List</a>

        <a class="text-warning hover:text-info" href="{{ url('bangladeshBank/banklist') }}"
        style="font-size: 15px; font-weight: 500; text-decoration:none; {{ Request::is('bangladeshBank/banklist') ? 'background-color: #ddd; color: blue;' : '' }}">Bank List</a>
        
</div>


