<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')

    <title>Agenda de Tarefas</title>
</head>
<body class="bg-slate-100">
    
    <main class="flex justify-center">
        <section class="bg-slate-2 mt-4 w-3/4 p-4 shadow-lg shadow-indigo-200/50">

            <h1 class="text-2xl text-indigo-800">Agenda de Tarefas</h1>

            <hr class="mb-2 mt-2">

            <div class="flex justify-end">
                <a href="/task/create" class="rounded-md bg-indigo-500 p-2 text-indigo-50 shadow-md shadow-indigo-500/50 hover:bg-indigo-400">Adicionar Tarefa</a>
            </div>

            <article>
                <h2 class="text-xl text-indigo-700">Tarefas Cadastradas</h2>
                <table class="mt-4 w-full table-auto">
                    <thead >
                        <tr class="bg-indigo-300 text-sm">
                            <th class="rounded-lg">id</th>
                            <th class="rounded-lg">Description</th>
                            <th class="rounded-lg">Date</th>
                            <th class="rounded-lg">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                        <tr class="text-sm">
                            <td class="rounded-lg bg-indigo-100 text-center text-sm font-bold">{{ $task->id }}</td>
                            <td class="border border-gray-200 pl-1 pr-1">{{ $task->description }}</td>
                            <td class="border border-gray-200 pl-1 pr-1">{{ Carbon\Carbon::parse($task->date)->format('d/m/Y') }}</td>
                            <td class="border border-gray-200 pl-1 pr-1">
                                <a href="/task/{{ $task->id }}">
                                    <x-heroicon-s-trash class="w-5 text-red-500 hover:text-red-400" />
                                </a> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </article>
        </section>
    </main>
</body>
</html>