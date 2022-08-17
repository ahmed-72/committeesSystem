<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    {{$committee->committeeID}}
    <ul>
        <li>
            sessions:
            <ul>
                @foreach($committee->sessions as $session)
                <li>{{$session->sessionID}}</li>
                @endforeach
            </ul>
        </li>
        <li>
            members:
            <ul>
                @foreach($committee->members as $member)
                <li> {{$member->memberID}}</li>
                @endforeach
            </ul>
        </li>
        <li>
            tasks:
            <ul>
                @foreach($committee->tasks as $task)
                <li> {{$task->taskID}}</li>
                @endforeach
            </ul>
        </li>
        <li>
            requlations:
            <ul>
                @foreach($committee->regulations as $regulation)
                <li> {{$regulation->regulationID}}</li>
                @endforeach
            </ul>
        </li>
        <li>
            topics:
            <ul>
                @foreach($committee->sessionTopics as $sessionTopic)
                <li> {{$sessionTopic->discussiontopic_topicID}}</li>
                @endforeach
            </ul>
        </li>

    </ul>
</body>

</html>