<!-- loop through all opportunities and display accordingly -->
<div>

  @if ($opps->where('user_id', Auth::user()->id)->count() === 0)
  <h1 class=" font-bold">No created opportunities at the moment!</h1>

  @else

  @foreach ($opps->where('user_id', Auth::user()->id) as $oop)
  <div class="max-w-xl mx-auto bg-white mb-2 rounded-xl shadow-md overflow-hidden md:max-w-2xl">
    <div class="md:flex h-fit gap-2">
      <div class="md:shrink-0 flex items-start justify-center p-2">
        <img class=" size-16 rounded-full object-cover " src="{{$oop['image_url']}}">
      </div>
      <div>
        <div class="uppercase font-semibold">
          <!-- category badge according to category of the oop -->
          @if ($oop['category_id'] === 1)
          <span class="inline-flex items-center rounded-md bg-green-50 mt-2 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Job</span>
          @elseif ($oop['category_id'] === 2)
          <span class="inline-flex items-center rounded-md bg-blue-50 mt-2 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">Internship</span>
          @elseif ($oop['category_id'] === 3)
          <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 mt-2  py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">Volunteer</span>
          @endif
        </div>
        <a href="{{route('pages.opportunity', $oop['id'])}}" class="block mt-1 text-lg leading-tight font-medium text-black hover:no-underline hover:text-customColor">{{$oop['title']}}</a>
        <p class="mt-2 text-slate-500">

          <!-- php script to trim the description if very long to conserve space -->
          <!-- rest of the content will be shown in the view_oop page -->
          @php
          $desc = $oop['description'];
          if (($desc) > 50) {
          $desc = substr($desc, 0, 50). '...';
          }
          @endphp
          {{$desc}}

        </p>

        <!-- buttons displayed in company view only -->
        @if ($publish)
        <button class="my-2 uppercase">
          <a href="{{route('pages.unpublish', $oop['id'])}}" class="flex gap-1 items-center justify-center px-2 py-1 text-xs font-semibold  text-white bg-customColor ring-1 ring-inset ring-customColor hover:no-underline hover:bg-customColorDark">
            Unpublish
          </a>
        </button>
        @endif

        @if ($unpublish)
        <button class="my-2 uppercase">
          <a href="{{route('pages.publish', $oop['id'])}}" class="flex gap-1 items-center justify-center px-2 py-1 text-xs font-semibold  text-white bg-customColor ring-1 ring-inset ring-customColor hover:no-underline hover:bg-customColorDark">
            Publish
          </a>
        </button>
        @endif

        <button class="my-2 uppercase">
          <a href="{{route('pages.edit_opportunity', $oop->id)}}" class="flex gap-1 items-center justify-center px-2 py-1 text-xs font-semibold  text-white bg-customColor ring-1 ring-inset ring-customColor hover:no-underline hover:bg-customColorDark">
            Edit
          </a>
        </button>
        <button class="my-2 uppercase">
          <a href="{{route('pages.delete_opportunity', $oop->id)}}" onclick="confirmation()" class="flex gap-1 items-center justify-center px-2 py-1 text-xs font-semibold  text-white bg-customColor ring-1 ring-inset ring-customColor hover:no-underline hover:bg-rose-500">
            Delete
          </a>
        </button>
        
          @if ($unpublish)
            <p class="text-[12px] text-gray-500 font-medium pb-2">Created {{$oop->created_at->diffForHumans()}}</p>  
          @else
            <p class="text-[12px] text-gray-500 font-medium pb-2">Published {{

              Carbon\Carbon::parse($oop->published_at)->diffForHumans()

            }}</p>  
          @endif


      </div>
    </div>
  </div>
  @endforeach

  @endif

</div>

<!-- general: for guests, company and seeker -->

<div class="flex-1 justify-between items-center ">
  <!-- search and filter opportunities -->
  <div class="flex-col items-center justify-end gap-2">
    <form action="" method="POST" class="flex gap-1 justify-end">
      <input autocomplete type="text" name="search" id="search_field" class=" w-3/4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customColor focus:border-customColor block p-2.5 white:bg-gray-700 dark:placeholder-gray-600 dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search by job title, category or company">
      <button type="submit" class="rounded-lg px-2 py-1 text-sm font-semibold  text-white bg-customColor ring-1 ring-inset ring-customColor hover:no-underline hover:bg-customColorDark">
        Search
      </button>
    </form>
  </div>
</div>