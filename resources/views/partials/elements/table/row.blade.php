 <tr>
    @foreach($headers as $header => $data)
        <td>

            @isset($data['route'])
                <a href="{{ route($data['route'], ['id' => $item->id]) }}">
            @endisset

            @foreach($data['item'] as $dataItems)

                @php
                    $dataItem = explode('.', $dataItems);
                @endphp
                @php
                    $hunter = $item;
                    $needle = null;
                    foreach($dataItem as $itemList){
                        if(isset($hunter->$itemList)){
                            $hunter = $hunter->$itemList;
                        }else{
                            $hunter = $data['fallback'];
                            break;
                        }
                    }

                    echo ucwords(strtolower($hunter));

                @endphp
            @endforeach
            @isset($data['route'])
                </a>
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

