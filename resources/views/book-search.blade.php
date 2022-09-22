<x-layout>
    <div class="vr"></div>
    <div class="col-md-9">
        <div class="row">

            <div class="col-md-12">

              <x-search/>

            </div>
        </div>
        <br><br>
        <x-booklist :books="$books" />

    </div>
</x-layout>
