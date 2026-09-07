# PowerShell helper for Git operations using the portable MinGit binary.
# This script assumes the MinGit binary is located at ./minigit/cmd/git.exe relative to the repository root.
# Usage examples:
#   .\git-helper.ps1 -Action add
#   .\git-helper.ps1 -Action commit -Message "Your commit message"
#   .\git-helper.ps1 -Action push

param(
    [Parameter(Mandatory = $true)][ValidateSet('add','commit','push','status','pull')]
    [string]$Action,
    [string]$Message = 'Update',
    [string]$RepoRoot = '.'
)

# Ensure portable git is on PATH for this session
$gitPath = Join-Path $PSScriptRoot 'minigit\cmd'
if (-not ($env:PATH -like "*$gitPath*")) {
    $env:PATH = "$env:PATH;$gitPath"
}

Set-Location -Path $RepoRoot

switch ($Action) {
    'add'   { git add . }
    'commit' { git commit -m $Message }
    'push'   { git push origin main }
    'status' { git status }
    'pull'   { git pull origin main }
    default { Write-Error "Unsupported action: $Action" }
}
