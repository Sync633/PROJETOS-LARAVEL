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
                        
                    </thead>

                </table>
            </article>
        </section>
    </main>
</body>
</html>