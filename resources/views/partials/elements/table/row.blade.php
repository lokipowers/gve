 <tr>
    @foreach($headers as $header => $data)
        <td>

            @isset($data['nobr'])
                <nobr>
            @endisset

            @isset($data['route'])
                @php
                    $routeParams = ['id' => $item->id];
                    if(isset($data['routeParams'])){
                        $routeParams = [];
                        foreach($data['routeParams'] as $name => $param){
                            $routeParams[$name] = strtolower($item->$param);
                        }
                    }
                @endphp

                <a href="{{ route($data['route'], $routeParams) }}">
            @endisset

            @isset($data['prepend'])
                {{ $data['prepend'] }}
            @endisset

            @isset($data['icon_before'])
                <i style="font-size:1.2em; vertical-align: sub;" class="material-icons">{{ $data['icon_before'] }}</i>
            @endisset

            @foreach($data['item'] as $dataItems)

                @php
                    $dataItem = explode('.', $dataItems);
                @endphp
                @php
                    $hunter = $item;
                    $needle = null;
                    foreach($dataItem as $itemList){

                        if(strpos($itemList, '{{') !== false){
                            $find = str_replace('{{', '', str_replace('}}', '', $itemList));
                            $itemList = strtolower($item->$find);
                        }


                        if(isset($hunter->$itemList)){
                            $hunter = $hunter->$itemList;
                        }else{
                            $hunter = $data['fallback'];
                            break;
                        }
                    }

                    if(isset($data['type']) && $data['type'] == 'image'){
                        $imageSrc = $hunter->getFirstMediaUrl($data['image']);
                        echo '<img src="'. $imageSrc .'" alt="'. $hunter->name .' '. $data['image'] .'" style="width:300px; max-width: 100%;align-self:center;">';
                    }else{
                        echo ucwords(strtolower($hunter));
                    }

                @endphp
            @endforeach

            @isset($data['icon_after'])
                <i style="font-size:1.2em; vertical-align: sub;" class="material-icons">{{ $data['icon_after'] }}</i>
            @endisset

            @isset($data['append'])
                {{ $data['append'] }}
            @endisset
            @isset($data['route'])
                </a>
            @endisset
            @isset($data['nobr'])
                </nobr>
            @endisset
        </td>
    @endforeach

        @if($actions !== null)
            <td class="text-right">
                @foreach($actions as $title => $action)
                    @php
                        $display = true;
                        $actionHTML = '<a href="'.route($action['route'], ['id' => $item->id]).'" class="btn btn-link btn-'.$action['class'].' btn-just-icon" data-toggle="tooltip" data-placement="top" title="'.$title.'">
                                        <i class="material-icons">'.$action['icon'].'</i>
                                        <div class="ripple-container"></div>
                                    </a>';

                        if(isset($action['if'])){
                            foreach($action['if'] as $if){
                                $itemChild = $if[0];
                                if(!parse_condition($item->$itemChild . ' ' .$if[1]. ' ' .$if[2])){
                                    $display = false;
                                }
                            }
                        }
                        if($display === true){
                            echo $actionHTML;
                        }
                    @endphp
                @endforeach
            </td>
        @endif
</tr>

