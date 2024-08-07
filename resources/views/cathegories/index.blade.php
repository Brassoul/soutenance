<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  <table class="table table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cathegories</th>
                            <th scope="col">Action</th>

                          </tr>
                        </thead>
                        <tbody>
                          
                          @foreach ($cathegories as $item)
                          <tr>
                              <td>{{ $item->id }}</td>
                              <td>{{ $item->cathegorie }}</td>
                              <td>
                                  <div class="d-grid gap-2 d-md-block">
                                      <a href="{{ route('cathegories.edit', $item->id) }}" class="btn btn-success">
                                          <i class="fa-solid fa-pen-to-square"></i>
                                      </a>
                                      <a href="{{ route('cathegories.show', $item->id) }}" class="btn btn-primary">
                                          <i class="fa-solid fa-eye"></i>
                                      </a>
                                      <form action="{{ route('cathegories.delete', $item->id) }}" method="post" style="display:inline-block;">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
                                              <i class="fa-solid fa-trash"></i>
                                          </button>
                                      </form>
                                  </div>
                              </td>
                          </tr>
                      @endforeach
                      

                         
                          
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>




</x-app-layout>