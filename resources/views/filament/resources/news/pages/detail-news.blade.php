<x-filament-panels::page>
   <div class="">
      <div id="header" class="mt-4">
         <h1 class="text-2xl font-bold capitalize">{{$record->title}}</h1>
         <p class="text-[11px] mx-2 font-medium text-yellow-500">Writing By {{$record->writer}}</p>
      </div>
      <div id="body" class="my-6 mx-2 text-[14px] font-normal text-justify w-[60%] leading-6">
         <p class="line-clamp-3">{!!$record->description!!}</p>
      </div>
      <div id="footer" class="mb-4">

      </div>
   </div>
</x-filament-panels::page>