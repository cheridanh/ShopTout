<x-mail::message>
# Votre commande

Votre commande a bien été enregistrée pour :
    <a href="{{ route('articles.show', ['slug' => $article->getSlug(), 'article' => $article]) }}" target="_blank">
        {{ $article->name }}
    </a>

- Prénom : {{ $data['firstname'] }}<br>
- Nom : {{ $data['lastname'] }}<br>
- Téléphone : {{ $data['phone'] }}<br>
- Quartier : {{ $data['quarter'] }}<br>

<x-mail::button :url="''">
Voir votre commande
</x-mail::button>

Merci,<br>
L'équipe {{ config('app.name') }}
</x-mail::message>
