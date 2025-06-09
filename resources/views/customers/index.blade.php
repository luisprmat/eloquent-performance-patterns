<x-app-layout>
  <x-slot:title>{{ __('Customers') }}</x-slot>

  <header class="bg-white shadow-sm">
    <div class="mx-auto max-w-6xl px-4 py-6 sm:px-6 lg:px-8">
      <div class="md:flex md:items-center md:justify-between">
        <div class="min-w-0 flex-1">
          <h2
            class="text-2xl leading-7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:leading-9"
          >
            {{ __('Customers') }}
          </h2>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
          <span class="rounded-md shadow-xs">
            <button
              type="button"
              class="focus:shadow-outline-blue inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm leading-5 font-medium text-gray-700 transition duration-150 ease-in-out hover:text-gray-500 focus:border-blue-300 focus:outline-hidden active:bg-gray-50 active:text-gray-800"
            >
              {{ __('New :name', ['name' => __('customer')]) }}
            </button>
          </span>
        </div>
      </div>
    </div>
  </header>

  <main class="mx-auto max-w-6xl py-12 sm:px-6 lg:px-8">
    <div class="w-full rounded-md bg-white p-2 shadow-sm">
      <div class="rounded" style="height: 600px" id="map"></div>
    </div>
  </main>

  <link
    href="https://api.mapbox.com/mapbox-gl-js/v3.12.0/mapbox-gl.css"
    rel="stylesheet"
  />
  <script src="https://api.mapbox.com/mapbox-gl-js/v3.12.0/mapbox-gl.js"></script>
  <script>
    mapboxgl.accessToken = '{{ config('services.mapbox.token') }}';

    const map = new mapboxgl.Map({
      container: 'map',
      style: 'mapbox://styles/mapbox/streets-v11',
      center: [-96, 53.8],
      zoom: 3.1,
    });

    const regions = @json($regions->map->only('id', 'color', 'geometry_as_json'));
    const customers = @json($customers->map->only('latitude', 'longitude'));

    map.on('load', function () {
      regions.forEach(function (region) {
        map.addSource(`region-${region.id}`, {
          type: 'geojson',
          data: JSON.parse(region.geometry_as_json),
        });
        map.addLayer({
          id: `region-${region.id}`,
          type: 'fill',
          source: `region-${region.id}`,
          layout: {},
          paint: {
            'fill-color': region.color,
            'fill-opacity': 0.8,
          },
        });
      });

      customers.forEach(function (customer) {
        var el = document.createElement('div');
        el.innerHTML = `<div class="rounded-full bg-white w-3 h-3 bg-white opacity-75"></div>`;

        new window.mapboxgl.Marker(el)
          .setLngLat([customer.longitude, customer.latitude])
          .addTo(map);
      });
    });
  </script>
</x-app-layout>
