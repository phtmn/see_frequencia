<div class="container text-center">
    <h2 id="status-label">Carregando IA...</h2>

    <div style="position: relative; display: inline-block;">
        <video id="webcam" autoplay muted width="400" height="300" class="rounded border"></video>
        <canvas id="overlay" style="position: absolute; top: 0; left: 0;"></canvas>
    </div>

    <form id="frequenciaForm" action="{{ route('frequencia.store', $aula->id) }}" method="POST">
        @csrf
        <input type="hidden" name="lat" id="lat">
        <input type="hidden" name="lng" id="lng">
        <button type="submit" id="btnConfirmar" class="btn btn-success btn-lg" disabled>
            Aguardando Reconhecimento...
        </button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/face-api.js@0.22.2/dist/face-api.min.js"></script>

<script>
    const video = document.getElementById('webcam');
    const label = document.getElementById('status-label');
    const btn = document.getElementById('btnConfirmar');

    // URL da foto oficial do aluno (vinda do banco de dados)
    const fotoReferenciaUrl = "{{ asset('storage/' . auth()->user()->foto_perfil) }}";

    async function iniciarSistema() {
        // 1. Carregar modelos
        await faceapi.nets.ssdMobilenetv1.loadFromUri('/models');
        await faceapi.nets.faceLandmark68Net.loadFromUri('/models');
        await faceapi.nets.faceRecognitionNet.loadFromUri('/models');

        // 2. Iniciar Câmera
        const stream = await navigator.mediaDevices.getUserMedia({ video: {} });
        video.srcObject = stream;

        // 3. Preparar imagem de referência do Aluno
        const imgRef = await faceapi.fetchImage(fotoReferenciaUrl);
        const fullFaceDescription = await faceapi.detectSingleFace(imgRef)
            .withFaceLandmarks()
            .withFaceDescriptor();

        if (!fullFaceDescription) {
            alert("Erro: Sua foto de perfil não é clara o suficiente.");
            return;
        }

        const faceMatcher = new faceapi.FaceMatcher(fullFaceDescription, 0.6);

        // 4. Loop de detecção
        label.innerText = "Posicione seu rosto em frente à câmera";

        setInterval(async () => {
            const detections = await faceapi.detectSingleFace(video)
                .withFaceLandmarks()
                .withFaceDescriptor();

            if (detections) {
                const match = faceMatcher.findBestMatch(detections.descriptor);

                if (match.label !== 'unknown') {
                    label.innerText = "Rosto Identificado! ✅";
                    btn.disabled = false;
                } else {
                    label.innerText = "Rosto não reconhecido ❌";
                    btn.disabled = true;
                }
            }
        }, 1000);

        // 5. Pegar GPS
        navigator.geolocation.getCurrentPosition(p => {
            document.getElementById('lat').value = p.coords.latitude;
            document.getElementById('lng').value = p.coords.longitude;
        });
    }

    iniciarSistema();
</script>