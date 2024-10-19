<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="background-color: #ffffff; padding: 20px; border-radius: 5px;">
    <tr>
        <td style="padding-bottom: 20px; text-align: center;">
            <h2 style="color: #333333;">Nova Comunicação Judicial Recebida</h2>
        </td>
    </tr>
    <tr>
        <td style="padding-bottom: 20px;">
            <p style="color: #333333; font-size: 16px;">Prezado(a) Dr(a). <strong>{{ $comunicacao->user->first_name }}</strong>,</p>
            <p style="color: #333333; font-size: 16px;">
                Você recebeu uma nova comunicação judicial. Abaixo segue um resumo das principais informações:
            </p>
        </td>
    </tr>

    <!-- Comunicação 1 -->
    <tr>
        <td style="background-color: #f9f9f9; padding: 10px; border-radius: 5px; margin-bottom: 10px;">
            <h4 style="color: #333333;">Processo nº {{ $comunicacao->numeroprocessocommascara }}</h4>
            <p style="color: #333333;">
                <strong>Tribunal:</strong>  {{ $comunicacao->sigla_tribunal }}<br>
                <strong>Data de Disponibilização:</strong> {{ $comunicacao->data_disponibilizacao }}<br>
                <strong>Tipo de Comunicação:</strong> {{ $comunicacao->tipo_comunicacao }}<br>
                <strong>Órgão:</strong> {{ $comunicacao->nome_orgao }}<br>
                <strong>Inteiro Teor:</strong> <a href="{{ $comunicacao->link }}" target="_blank" style="color: #1e90ff;">Aqui</a>
            </p>
        </td>
    </tr>

    <tr>
        <td style="padding-top: 20px;">
            <p style="color: #333333; font-size: 16px;">Para mais detalhes, acesse o sistema de notificações judiciais.</p>
        </td>
    </tr>

    <tr>
        <td style="padding-top: 30px; text-align: center; border-top: 1px solid #eeeeee;">
            <p style="color: #777777; font-size: 14px;">
                Atenciosamente, <br>
                <strong>Equipe de Suporte</strong><br>
                [Nome da sua empresa]<br>
                <strong>Contato:</strong> <a href="mailto:suporte@example.com">suporte@example.com</a> | (11) 1234-5678
            </p>
        </td>
    </tr>
</table>
