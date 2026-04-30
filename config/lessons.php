<?php
declare(strict_types=1);

/**
 * Lições: slug => metadados + perguntas (tipo duolingo).
 */
return [
    'en-basico-1' => [
        'title' => 'Inglês básico 1',
        'subtitle' => 'Saudações e essenciais',
        'icon' => '🇬🇧',
        'questions' => [
            [
                'type' => 'translate',
                'prompt' => 'Traduza para o português:',
                'phrase' => 'Hello',
                'choices' => ['Olá', 'Adeus', 'Obrigado', 'Por favor'],
                'correct' => 0,
            ],
            [
                'type' => 'translate',
                'prompt' => 'Traduza para o inglês:',
                'phrase' => 'Obrigado',
                'choices' => ['Thanks', 'Please', 'Sorry', 'Welcome'],
                'correct' => 0,
            ],
            [
                'type' => 'listen', // visual só — escolha correta
                'prompt' => 'Escolha a palavra em inglês para:',
                'phrase' => 'água',
                'choices' => ['water', 'fire', 'bread', 'milk'],
                'correct' => 0,
            ],
            [
                'type' => 'translate',
                'prompt' => 'Complete a frase:',
                'phrase' => 'Good ___',
                'choices' => ['morning', 'night', 'bye', 'hi'],
                'correct' => 0,
            ],
            [
                'type' => 'translate',
                'prompt' => 'Traduza para o inglês:',
                'phrase' => 'Por favor',
                'choices' => ['Please', 'Thanks', 'Hello', 'Sorry'],
                'correct' => 0,
            ],
        ],
    ],
    'en-basico-2' => [
        'title' => 'Inglês básico 2',
        'subtitle' => 'Família e números',
        'icon' => '👨‍👩‍👧',
        'questions' => [
            [
                'type' => 'translate',
                'prompt' => 'Traduza para o inglês:',
                'phrase' => 'Mãe',
                'choices' => ['mother', 'father', 'sister', 'brother'],
                'correct' => 0,
            ],
            [
                'type' => 'translate',
                'prompt' => 'Traduza para o português:',
                'phrase' => 'three',
                'choices' => ['três', 'dois', 'cinco', 'dez'],
                'correct' => 0,
            ],
            [
                'type' => 'translate',
                'prompt' => 'Traduza para o inglês:',
                'phrase' => 'Cachorro',
                'choices' => ['dog', 'cat', 'bird', 'fish'],
                'correct' => 0,
            ],
            [
                'type' => 'translate',
                'prompt' => 'Escolha em inglês a palavra para o número:',
                'phrase' => '7',
                'choices' => ['seven', 'six', 'eight', 'nine'],
                'correct' => 0,
            ],
        ],
    ],
    'en-medio-1' => [
        'title' => 'Inglês médio 1',
        'subtitle' => 'Frases úteis e tempos verbais',
        'icon' => '📗',
        'questions' => [
            [
                'type' => 'translate',
                'prompt' => 'Traduza para o português:',
                'phrase' => 'Could you help me, please?',
                'choices' => ['Você poderia me ajudar, por favor?', 'Você me odeia?', 'Onde fica a saída?', 'Eu não entendo nada.'],
                'correct' => 0,
            ],
            [
                'type' => 'translate',
                'prompt' => 'Complete a frase:',
                'phrase' => 'If I ___ you, I would accept the offer.',
                'choices' => ['were', 'was', 'am', 'had been'],
                'correct' => 0,
            ],
            [
                'type' => 'translate',
                'prompt' => 'Qual frase usa o Present Perfect corretamente?',
                'phrase' => '',
                'choices' => ['I have finished my homework.', 'I finish my homework yesterday.', 'I am finishing my homework tomorrow.', 'I finished my homework now.'],
                'correct' => 0,
            ],
            [
                'type' => 'translate',
                'prompt' => 'Traduza: The flight was delayed',
                'phrase' => 'The flight was delayed',
                'choices' => ['O voo atrasou', 'O voo foi cancelado', 'O voo decolou cedo', 'O voo estava vazio'],
                'correct' => 0,
            ],
            [
                'type' => 'translate',
                'prompt' => 'Escolha a tradução para o inglês:',
                'phrase' => 'sugestão',
                'choices' => ['suggestion', 'question', 'complaint', 'invitation'],
                'correct' => 0,
            ],
        ],
    ],
    'en-medio-2' => [
        'title' => 'Inglês médio 2',
        'subtitle' => 'Conectores, voz passiva e phrasal verbs',
        'icon' => '📘',
        'questions' => [
            [
                'type' => 'translate',
                'prompt' => 'O que significa neste contexto?',
                'phrase' => 'She turned down the job offer.',
                'choices' => ['Ela recusou a proposta de emprego.', 'Ela aceitou o emprego.', 'Ela demitiu o chefe.', 'Ela pediu aumento.'],
                'correct' => 0,
            ],
            [
                'type' => 'translate',
                'prompt' => 'Complete com a forma correta:',
                'phrase' => 'I\'m looking forward to ___ you again.',
                'choices' => ['seeing', 'see', 'saw', 'seen'],
                'correct' => 0,
            ],
            [
                'type' => 'translate',
                'prompt' => 'Escolha a melhor tradução para o português:',
                'phrase' => 'The decision was made yesterday.',
                'choices' => ['A decisão foi tomada ontem.', 'A decisão será tomada amanhã.', 'Eles estão decidindo agora.', 'Ninguém tomou decisão.'],
                'correct' => 0,
            ],
            [
                'type' => 'translate',
                'prompt' => 'Qual conector encaixa melhor?',
                'phrase' => '___ it was raining, we went hiking.',
                'choices' => ['Although', 'Because of', 'Therefore', 'Moreover'],
                'correct' => 0,
            ],
            [
                'type' => 'translate',
                'prompt' => 'Traduza para o inglês:',
                'phrase' => 'Por outro lado',
                'choices' => ['on the other hand', 'in addition', 'as a result', 'for instance'],
                'correct' => 0,
            ],
            [
                'type' => 'translate',
                'prompt' => 'Escolha a frase gramaticalmente correta:',
                'phrase' => '',
                'choices' => ['He suggested that she apply for the scholarship.', 'He suggested that she applies for the scholarship.', 'He suggested that she applying for the scholarship.', 'He suggested she to apply for the scholarship.'],
                'correct' => 0,
            ],
        ],
    ],
    'en-dificil' => [
        'title' => 'Inglês difícil',
        'subtitle' => 'Vocabulário raro, formal e expressões avançadas',
        'icon' => '🎓',
        'questions' => [
            [
                'type' => 'translate',
                'prompt' => 'Traduza para o português (sentido usual):',
                'phrase' => 'ubiquitous',
                'choices' => ['onipresente', 'inexistente', 'raro', 'invisível'],
                'correct' => 0,
            ],
            [
                'type' => 'translate',
                'prompt' => 'Traduza para o português:',
                'phrase' => 'to mitigate the risks',
                'choices' => ['mitigar os riscos', 'ignorar os riscos', 'aumentar os riscos', 'celebrar os riscos'],
                'correct' => 0,
            ],
            [
                'type' => 'translate',
                'prompt' => 'Qual palavra em inglês corresponde a “efêmero”?',
                'phrase' => 'efêmero',
                'choices' => ['ephemeral', 'eternal', 'tedious', 'redundant'],
                'correct' => 0,
            ],
            [
                'type' => 'translate',
                'prompt' => 'O que significa o idiom?',
                'phrase' => 'to beat around the bush',
                'choices' => ['enrolar / não ir direto ao assunto', 'correr no mato', 'bater em arbustos', 'perder a paciência'],
                'correct' => 0,
            ],
            [
                'type' => 'translate',
                'prompt' => 'Traduza para o inglês:',
                'phrase' => 'ambiguidade',
                'choices' => ['ambiguity', 'ambition', 'ability', 'amenity'],
                'correct' => 0,
            ],
            [
                'type' => 'translate',
                'prompt' => 'Escolha o sinónimo mais próximo em inglês:',
                'phrase' => 'parsimonious',
                'choices' => ['stingy / frugal', 'generous', 'talkative', 'confused'],
                'correct' => 0,
            ],
            [
                'type' => 'translate',
                'prompt' => 'Traduza para o português (registo formal):',
                'phrase' => 'The caveat is that results may vary.',
                'choices' => ['A ressalva é que os resultados podem variar.', 'A certeza é que tudo falhará.', 'O objetivo é variar os preços.', 'Não há qualquer limitação.'],
                'correct' => 0,
            ],
            [
                'type' => 'translate',
                'prompt' => 'Complete com o termo adequado (inglês académico):',
                'phrase' => 'Further research is ___ to confirm these findings.',
                'choices' => ['warranted', 'forbidden', 'irrelevant', 'obsolete'],
                'correct' => 0,
            ],
        ],
    ],
];
