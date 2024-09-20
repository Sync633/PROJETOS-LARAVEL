<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')

    <title>Agenda de Tarefas</title>
</head>
<body>

    <main class="flex justify-center">
        <section class="bg-slate-2 mt-4 w-3/4 p-4 shadow-lg shadow-indigo-200/50">

            <h1 class="text-2xl text-indigo-800">Modificar Tarefa Atualizar</h1>

            <hr class="md-2 mt-2">

            <form action="{{route('task.update', $task->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="mt-4 flex flex-col">
                    <label for="description" class="text-indigo-500">Descrição da Tarefa</label>
                    <input type="text" name="description" id="description" class="rounded-md border border-indigo-600 p-2">
                </div>

                <div class="mt-4 flex flex-col">
                    <label for="date" class="text-indigo-500">Data Programada:</label>
                    <input type="date" name="date" id="date" class="rounded-md border border-indigo-600 p-2">
                </div>
                
                <div class="mt-4 flex flex-col">
                    <input type="submit" value="Salvar Alterações">
                </div>
            </form>

        </section>
    </main>
    
</body>
</html>