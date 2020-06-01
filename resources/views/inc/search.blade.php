{{-- inc/search.blade.php --}}

{!! Form::open(['method'=>'GET','url'=>'rooms','class'=>'navbar-form navbar-left','role'=>'sort'],['method'=>'GET','url'=>'rooms','class'=>'navbar-form navbar-left','role'=>'show_order'],['method'=>'GET','url'=>'rooms','class'=>'navbar-form navbar-left','role'=>'search']) !!}
<div class="top-filter">
    <div class="top-filter-child sort">
        <div class="select">
            <select onchange="this.form.submit()" name="sort">
                <option @isset($_GET['sort']) @if($_GET['sort'] == 'price') selected="selected" @endif @endisset name="price" value="price">Price</option>
                <option @isset($_GET['sort']) @if($_GET['sort'] == 'title') selected="selected" @endif @endisset name="title" value="title">Alphabetical</option>
                <option @isset($_GET['sort']) @if($_GET['sort'] == 'disc') selected="selected" @endif @endisset name="disc" value="disc">Discount</option>
                <option @isset($_GET['sort']) @if($_GET['sort'] == 'rating') selected="selected" @endif @endisset name="rating" value="rating">Rating</option>
            </select>
        </div>
    </div>

    <div class="top-filter-child order">
        <div class="select">
            <select onchange="this.form.submit()" name="show_order">
                <option @isset($_GET['show_order']) @if($_GET['show_order'] == 'asc') selected="selected" @endif @endisset value="asc">Ascending</option>
                <option @isset($_GET['show_order']) @if($_GET['show_order'] == 'desc') selected="selected" @endif @endisset value="desc">Descending</option>
            </select>
        </div>

    </div>

    <div class="top-filter-child search"><input type="text" class="search-field" name="search" placeholder="Search..."
            value="@isset($_GET['search']){{$_GET['search']}}@endisset">
        <button class="search-btn" type="submit"><i class="fas fa-search"></i></button></div>

</div>
{!! Form::close() !!}
