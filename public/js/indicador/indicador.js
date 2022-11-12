function fechData() {
    const starDate = $start.val();
    const endDate = $end.val();
    const url = 'http://127.0.0.1:8000/graficos?start=${starDate}&end=${endDate}';

};