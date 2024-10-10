<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Minha Agenda de Tarefas')}}
        </h2>
    </x-slot>

<body class="bg-slate-100">
    
    <main class="flex justify-center">
        <section class="bg-slate-2 mt-4 w-3/4 p-4 shadow-lg shadow-indigo-200/50">

            <div class="flex justify-end">
                <a href="/task/create" class="rounded-md bg-indigo-500 p-2 text-indigo-50 shadow-md shadow-indigo-500/50 hover:bg-indigo-400">Adicionar Tarefa</a>
            </div>

            <article>
                <h2 class="text-2xl text-indigo-700">Tarefas Cadastradas</h2>
                <table class="mt-4 w-full table-auto">
                    <thead >
                        <tr class="bg-indigo-300 text-md">
                            <th class="rounded-l-md p-2 border-r-2">ID</th>
                            <th class="p-2 border-r-2">Description</th>
                            <th class="p-2 border-r-2">Date</th>
                            <th class="p-2 border-r-2">Email</th>
                            <th class="rounded-r-md p-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                        <tr class="text-md">
                            <td class="rounded-l-md bg-indigo-100 text-center text-sm font-bold">{{ $task->id }}</td>
                            <td class="border border-gray-200 p-1">{{ $task->description }}</td>
                            <td class="border border-gray-200 p-1">{{ Carbon\Carbon::parse($task->date)->format('d/m/Y') }}</td>
                            <td class="border border-gray-200 p-1">{{$task->user->email}}</td>
                            <td class="rounded-r-md border border-gray-200 p-2 flex justify-center items-center">
                                <a href="{{route('task.edit', $task->id)}}" class="mr-1">
                                    <x-lucide-edit class="w-5 text-gray-700 hover:text-gray-500" />
                                </a> 
                                <a href="#" onclick="deleteTask( {{ $task->id }} )">
                                    <x-heroicon-s-trash class="w-5 text-red-500 hover:text-red-400" />
                                </a>
                                <form class="d-none" id="form-destroy-{{$task->id}}" action="{{ route('task.destroy', $task->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </article>
        </section>
    </main>
    
</body>
</x-app-layout>

<script>
    function deleteTask(id){
        if(confirm("Tem certeza que deseja EXCLUIR o registro?")){
            document.getElementById('form-destroy-'+id).submit();
        }
    }
</script>